# Laravel API Application

This Laravel application was developed by Kgosi Motlogelwa for a coding assessment. It serves as a demonstration of five API endpoints related to electoral constituencies, polling districts, and polling stations.

## API Endpoints

The application provides the following API endpoints:

1. **List Constituencies**:  
   `GET /api/v1/constituencies`

   This endpoint retrieves a list of all constituencies.

2. **List Polling Districts**:  
   `GET /api/v1/pollingDistricts`

   This endpoint retrieves a list of all polling districts.

3. **List Polling Stations**:  
   `GET /api/v1/pollingStations`

   This endpoint retrieves a list of all polling stations.

4. **List Polling Districts by Constituency**:  
   `GET /api/v1/constituencies/{constituencyId}/pollingDistricts`

   This endpoint retrieves a list of polling districts within a specific constituency.

5. **List Polling Stations by Polling District**:  
   `GET /api/v1/pollingDistricts/{pollingDistrictId}/pollingStations`

   This endpoint retrieves a list of polling stations within a specific polling district.

## Usage

To utilize the API endpoints, follow these steps:

1. Clone the repository to your local machine:

    ```
    git clone https://github.com/your-username/your-repository.git
    ```

2. Install dependencies using Composer:

    ```
    composer install
    ```

3. Configure your environment variables by duplicating the `.env.example` file to `.env` and updating it with your environment-specific values.

4. Generate an application key:

    ```
    php artisan key:generate
    ```

5. Run migrations to set up the database schema:

    ```
    php artisan migrate
    ```

6. Serve the application:

    ```
    php artisan serve
    ```

   By default, the application will be accessible at `http://localhost:8000`.

7. Access the API endpoints using a tool like cURL, Postman, or through your browser.

## Credits

This application was created by Kgosi Motlogelwa for a coding assessment.

## License

This project is licensed under the [MIT License](LICENSE).
