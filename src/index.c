#include "cgic.h"
#include <sqlite3.h>
#include <string.h>
#include <stdlib.h>
#include <time.h>

#define MAX_SQL_REQUEST_SIZE 32
#define MAX_SQL_OPTION_SIZE 32
#define MAX_STR_DATE_SIZE 32

int cgiMain() {
	char comma = ' ';
	char sql[MAX_SQL_REQUEST_SIZE];
	char slimit[MAX_SQL_OPTION_SIZE] = "";
	int limit;

	cgiHeaderContentType("application/json");

	// GET PARAMETERS FOR REQUEST
	cgiFormInteger("limit", &limit, 0);
	if (limit)
		snprintf(slimit, MAX_SQL_OPTION_SIZE, " LIMIT %d", limit);

	// REQUEST DB WITH ARGS FROM THE cgiForm
	sqlite3 *db;
	sqlite3_stmt *stmt;

	int rc = sqlite3_open("/data/database.db", &db);
	if (rc != SQLITE_OK) {
		fprintf(stderr, "Cannot open database: %s\n", sqlite3_errmsg(db));
		sqlite3_close(db);
		return 1;
	}

	snprintf(sql, MAX_SQL_REQUEST_SIZE, "SELECT * FROM bmp180 %s",
			slimit
		);

	fprintf(cgiOut, "[");

	sqlite3_prepare_v2(db, sql, -1, &stmt, NULL);

	while (sqlite3_step(stmt) != SQLITE_DONE) {
		char utc[MAX_STR_DATE_SIZE];
		int epoc = sqlite3_column_int(stmt, 0);

		// UTC date in ISO8601 format
		strftime(utc, MAX_STR_DATE_SIZE, "%FT%TZ", localtime(&epoc));

		fprintf(cgiOut, "%c\n\t{\"date\": \"%s\", \"iso8601\": \"%s\", \"temperature\": %f, \"pression\": %f}",
				comma,
				sqlite3_column_text(stmt, 2),
				utc,
				sqlite3_column_double(stmt, 1),
				sqlite3_column_double(stmt, 0)
		       );
		comma = ',';
	}

	sqlite3_finalize(stmt);
	sqlite3_close(db);

	fprintf(cgiOut, "\n]");

	return 0;
}


