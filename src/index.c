#include <cgic.h>
#include <sqlite3.h>
#include <string.h>
#include <stdlib.h>
#include <time.h>

#define MAX_SQL_REQUEST_SIZE 512
#define MAX_SQL_OPTION_SIZE 128
#define MAX_STR_DATE_SIZE 32

int cgiMain() {
	int limit;


	cgiHeaderContentType("application/json");

	// GET PARAMETERS FOR REQUEST
	cgiFormInteger("limit", &limit, 0);

	// REQUEST DB WITH ARGS FROM THE cgiForm
	sqlite3 *db;
	sqlite3_stmt *stmt;

	int rc = sqlite3_open("/data/

	// OUTPUT DATAS IN JSON FORMAT
	fprintf(cgiOut, "{ limit: %d }\n", testInt);
	return 0;
}

