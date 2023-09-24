const  config = {
    user:  'laravel', // sql user
    password:  'laravel', //sql user password
    server:  'localhost', // if it does not work try- localhost
    database:  'JavascriptDatabase',
    options: {
      trustedconnection:  true,
      enableArithAbort:  true,
      instancename:  'SQLEXPRESS'  // SQL Server instance name
    },
    port:  1433

  }
  
  module.exports = config;