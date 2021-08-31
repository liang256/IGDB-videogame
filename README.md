# IGDB videogames website

This project is a website, which shows recent popular games and their info, and is developed by Laravel and IGDB API.

The project is a practice of series: [Build a Video Game Aggregator](https://laracasts.com/series/build-a-video-game-aggregator). I followed almost every step of this tutorial. I really appreciate this series and learned a lot from it.

## Installation

Copy env.example
```bash
cp env.example .env
```

Install required packages using Composer
```bash
composer install
```

Add IGDB API token into `.env`.
More details please go [here](https://api-docs.igdb.com/#authentication).
```
IGDB_AUTH = "Bearer <your_access_token>"
IGDB_CLIENT_ID = <your_Client_ID>
```


## License

[Laravel](https://laravel.com/).

[IGDB API](https://api-docs.igdb.com/#about)

[Tutorial: Build a Video Game Aggregator](https://laracasts.com/series/build-a-video-game-aggregator)
