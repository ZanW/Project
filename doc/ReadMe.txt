Deployment Procedure
====================

1. Since the applciation runs at /serverName/pog, it is required to redirect to the app for user type only /serverName/. Therefore, upload also /doc/index.php to root directory at the //serverName/
2. The rests are to upload the whole /pog/ folder to the root directory at the //serverName/.
We expect the following items at the server directory as the result of deployment
	2.1. //serverName/index.php (where index.php is from /pop/doc/index.php)
	2.2. //serverName/pog/   (folder as it is from the repository)

Note. For localhost at developer computer, you may use the host name localhost instead of remote host. Therefore, uncomment localhost, and comment out remote host in:
- file: //pog/application/config/config.php
- line: $config['base_url'] = 'http://localhost:8000/pog/'; // or 'http://localhost/pog/'



