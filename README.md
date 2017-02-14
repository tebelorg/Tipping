# TA.Ping
TA.Ping is a ping script to check website or webservice and send email alert

![Sample Ping](https://github.com/tebelorg/TA.Ping/raw/master/sample.jpg)

# Why This
No-frills way to host your own website or webservice monitoring (obviously if your entire server is down including mail and network this will not work; but you can buddy up with a friend and monitor each other's websites)

Originally developed pro bono for monitoring a social mission website with over 1 million monthly pageviews

# Set Up
- Update pinger.php with your email alert settings and server path
- Update mailer.php with your signature and catch-all email etc

# To Use
Run the job on its own or from a scheduler, for example the crontab entry below checks every 15 minutes
```
0,15,30,45 * * * * /usr/local/bin/php /full_path_on_your_server/pinger.php http://tebel.org "open-source software" >> /full_path_on_your_server/pinger.log
```
Support triggering from URL through a web browser or webservice API (first enable that option in pinger.php)
```
your_website_url/pinger.php?URL=http://tebel.org&CHECK=open-source software
```

# Pipeline
Feature|Details
:-----:|:------
Enhancements|feel free to review and suggest new features

# License
TA.Ping is open-source software released under the MIT license
