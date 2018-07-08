# News Quiz
Modern webbased news reader working on every device with the core function to ask questions about daily topics.
Bringing daily news with a gaming concept to people who don't like to read the news paper. 
Compare with friends, earn points, learn more daily general knowledge. 
Build on the [Code+Content][1] media hackathon sponsored by [NDR][2], [Tagesschau][3], [Next Media Accelerator][4] and [Goolge News Initiative][5].

# Getting started

Copy the **.env.example** file to **.env** and configure the database you prefer.
To install the dependencies, generate the application key and build the application do the following:

```
npm install
composer install
php artisan key:generate
npm run prod
``` 
At the end run a webserver that supports php in the **public** directory.

# License
GPLv3

[1]: https://www.eventbrite.de/e/45890882866
[2]: https://www.ndr.de
[3]: http://www.tagesschau.de/
[4]: https://nma.vc/hackathons
[5]: https://newsinitiative.withgoogle.com/