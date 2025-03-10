# PHP Weather

PHP Weather is a simple weather application built with PHP. This project is currently in its initial stages.

## Features

- Fetches weather data using hardcoded latitude and longitude.
- Plans to add functionality to the form for dynamic latitude and longitude input.

## Installation

1. Clone the repository:

    ```sh
    git clone https://github.com/yourusername/php-weather.git
    ```

2. Navigate to the project directory:

    ```sh
    cd php-weather
    ```

3. Install dependencies:

    ```sh
    composer install
    ```

4. Create a `.env` file in the root directory and add your API key:

    ```sh
    touch .env
    ```

    Add the following line to the `.env` file:

    ```env
    OPENWEATHERMAP_API_KEY=your_api_key_here
    ```

5. Ensure the `.env` file is not tracked by Git by adding it to your `.gitignore` file:

    ```sh
    echo ".env" >> .gitignore
    ```

## Usage

1. Navigate to the `src` directory:

    ```sh
    cd src
    ```

2. Run the PHP server:

    ```sh
    php -S localhost:<PORT>
    ```

3. Open your browser and navigate to `http://localhost:<PORT>`.

## Roadmap

- [ ] Add form functionality for dynamic latitude and longitude input.
- [ ] Improve error handling.
- [ ] Add unit tests.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request.

## License

This project is licensed under the MIT License.
