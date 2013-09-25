<?php
// -- user rights constants -----
define('ENABLED', 1);                  // enabled user
define('SCREENER_FULL', 2);            // full screener rights     
define('SCREENER_READONLY',4);         // read-only screener rights 
define('SCREENER_RIGHTS', 6);          // has screener rights ( full or readonly ) 
define('RECEIVER_FULL', 8);            // full receiver rights      
define('RECEIVER_READONLY',16);        // read-only receiver rights  
define('RECEIVER_RIGHTS', 24 );        // has receiver rights ( full or readonly )
define('LAB_FULL', 32);                // full lab rights
define('LAB_READONLY',64);             // read-only lab rights
define('LAB_RIGHTS', 96 );             // has lab rights ( full or readonly ) 
define('DELIVERY_FULL', 128);          // full delivery rights
define('DELIVERY_READONLY',256);       // read-only delivery rights
define('DELIVERY_RIGHTS', 384);        // has delivery rights ( full or readonly )
define('ACCOUNTING_FULL',512);         // full accounting rights
define('ACCOUNTING_READONLY',1024);    // read-only accounting rights
define('ACCOUNTING_RIGHTS', 1536);     // has accounting rights ( full or readonly )
define('ADMIN_FULL', 2048);            // full admin rights
define('ADMIN_READONLY', 4096);        // read-only admin rights
define('ADMIN_RIGHTS', 6144);          // has admin rights ( full or readonly ) 
define('RESEARCHER_FULL', 8192);       // full researcher rights
define('RESEARCHER_READONLY', 16384);  // read-only researcher rights
define('RESEARCHER_RIGHTS', 24576 );   // has researcher rights ( full or readonly )
define('REPORTS_FULL', 32768);         // full reports rights
define('REPORTS_READONLY', 65536);     // read-only reports rights
define('REPORTS_RIGHTS', 98304 );      // has reports rights ( full or readonly )

// -- database constants ---------
define('DB_SERVER','localhost');
define('DB_USER_NAME','multipq2_milk');
define('DB_PASSWORD','hJEkpSaJS$ycWEh,_c');
define('DB_DATABASE_NAME','multipq2_milk_db');

// -- misc constants ----------------
define('RESULTS_PER_PAGE',20); // for pagination of search results

?>
