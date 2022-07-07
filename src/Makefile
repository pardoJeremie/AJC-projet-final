CFLAGS = -O2 -mfpu=vfp -mfloat-abi=hard -w -g
LFLAGS = -lcgic
CROSS_COMPILE = ../buildroot-2022.02.2/output/host/bin/arm-buildroot-linux-uclibcgnueabihf-
CC = $(CROSS_COMPILE)gcc
TARGETS = $(patsubst %.c,%.cgi,$(wildcard ind*.c))

all: $(TARGETS) rising

%.cgi: %.c
	$(CC) $(CFLAGS) $(LFLAGS) -o $@ $<

rising: rising.c
	$(CC) $(CFLAGS) -o $@ $<

clean:
	$(RM) $(TARGETS)

scp:
	scp $(TARGETS) root@10.30.1.107:/var/www/mesures/
