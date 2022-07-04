#include <cgic.h>
#include <string.h>
#include <stdlib.h>

int cgiMain() {
	int testInt;

	cgiHeaderContentType("application/json");

	// GET PARAMETERS FOR REQUEST
	cgiFormInteger("limit", &testInt, 0);

	// REQUEST DB WITH ARGS FROM THE cgiForm

	// OUTPUT DATAS IN JSON FORMAT
	fprintf(cgiOut, "{ limit: %d }\n", testInt);
	return 0;
}

