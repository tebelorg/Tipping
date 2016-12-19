# TA.Ping
Ping script to check website or webservice availability and send email alert

# Why This
No-frills way to host your own website or webservice monitoring

# Set Up
1. Update taping.php with your email alert settings and server path
2. Update mailer.php with your signature and catch-all email etc

# To Use
Run the job on its own or from a scheduler, for example the crontab entry below checks every 15 minutes
```
0,15,30,45 * * * * /usr/local/bin/php /full_path_on_your_server/taping.php http://tebel.org "Open-source" >> /full_path_on_your_server/taping.log
```

# Pipeline
Feature|Details
:-----:|:------
Enhancements|feel free to review and suggest new features

# License
TA.Ping is open-source software released under the MIT license
