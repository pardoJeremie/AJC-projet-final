#include <fcntl.h>
#include <poll.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <time.h>
/*
Source 
	https://www.blaess.fr/christophe/2013/04/15/attentes-passives-sur-gpio/
	https://github.com/luisaburini/GPIO-interrupt/blob/master/gpio-poll.c
	http://manpagesfr.free.fr/man/man2/poll.2.html
Lancer le programme
	/data/rising /sys/class/gpio/gpio22/value
*/

int main(int argc, char * argv[])
{
    sleep(10); //attendre que les gpios soient init.
    int fd;
    struct pollfd  fds;
    char value;
    time_t timeofpoll, tactualtime;

    if (argc != 2) { // le programme prend en argument le chemin du fichier value du gpio que l'on veut observer.
        fprintf(stderr, "usage: %s \n", argv[0]);
        exit(EXIT_FAILURE);
    }
    if ((fd = open(argv[1], O_RDONLY)) < 0) {
        perror(argv[1]);
        exit(EXIT_FAILURE);
    }
    
    // file descriptor from SW is being polled
    fds.fd = fd;
    // poll events in GPIO 
    fds.events = POLLPRI;
    fds.revents = 0;

    while (1) {
        lseek(fd, 0, SEEK_SET); // position 0 dans le fichier lu
        read(fd, &value, 1); // read GPIO value
        //Les bits renvoyés dans revents peuvent inclure ceux spécifiés dans events, ou l'une des valeurs POLLERR, POLLHUP ou POLLNVAL. 
        //Si aucun événement attendu (ni aucune erreur) ne s'est déjà produit, poll() bloque jusqu'à ce que l'un des événements survienne.
        if (poll(& fds /*add tab pollfd*/
        , 1 /*taille du tab pollfd*/, -1 /*delay de bloquage infini*/) < 0) {
            perror("poll"); // affiche un message sur la sortie d'erreur standard, décrivant la dernière erreur rencontrée durant un appel système ou une fonction de bibliothèque.  
            break;
        }
        // print un "rising".
        timeofpoll = time(NULL);
        fprintf(stdout, "rising\n");
        system("echo timer > /sys/class/leds/led1/trigger");
        system("echo 500 > /sys/class/leds/led1/delay_off");
        system("echo 500 > /sys/class/leds/led1/delay_on");
        do {
            usleep(100000);
            lseek(fd, 0, SEEK_SET); 
            read(fd, &value, 1); // read GPIO value
            tactualtime = time(NULL);
            if (tactualtime - timeofpoll >= 6) {
                system("echo 300 > /sys/class/leds/led1/delay_off");
                system("echo 300 > /sys/class/leds/led1/delay_on");
            }
            else if(tactualtime - timeofpoll >= 3) {
                system("echo 400 > /sys/class/leds/led1/delay_off");
                system("echo 400 > /sys/class/leds/led1/delay_on");
            }
        } while (value == '1' && tactualtime - timeofpoll < 10); 

            system("echo none > /sys/class/leds/led1/trigger");
        if(tactualtime - timeofpoll >= 10) {
            system("echo 1 > /sys/class/leds/led1/brightness");
	    system("/scripts/resetdata");
        } 
    }
    close(fd);
    return EXIT_SUCCESS;
}
