# Laravel Project with Sail: Excel Report Generator

This project demonstrates the use of Laravel's Sail environment to execute a command-line utility that generates an Excel report based on user data within a specified date range. The Excel file is then stored in MinIO, simulating AWS S3 storage.

## Features

- **Command-line Interaction**: Trigger the generation of reports using a custom Artisan command.
- **Queue Management**: Utilize Laravel queues to process jobs asynchronously.
- **Excel Generation**: Create Excel files dynamically based on provided dates.
- **MinIO Storage**: Store generated Excel files in MinIO for AWS S3 simulation.

## Requirements

- Docker (for running Laravel Sail)
- Laravel Sail
- MinIO (or an equivalent AWS S3-compatible storage service)

## Installation

1. Clone the repository:

   ```bash
   git clone <repository-url>
   cd <project-directory>
   ```
2. Start the Laravel Sail environment:

   ```bash
   ./vendor/bin/sail up
   ```
3. Install project dependencies:

   ```bash
   ./vendor/bin/sail composer install
   ```
4. Configure your environment variables in `.env`:

   - Set up database connection.
   - Add MinIO configuration:
     ```env
     FILESYSTEM_DISK=s3
     AWS_ACCESS_KEY_ID=sail
     AWS_SECRET_ACCESS_KEY=password
     AWS_DEFAULT_REGION=us-east-1
     AWS_BUCKET=reports
     AWS_USE_PATH_STYLE_ENDPOINT=true
     AWS_URL=http://minio:9000/reports
     AWS_ENDPOINT=http://minio:9000
     ```
5. Run migrations to set up the database:

   ```bash
   ./vendor/bin/sail artisan migrate
   ```

## Usage

1. **Run the Command**:
   Use the following Artisan command to generate an Excel report:

   ```bash
   ./vendor/bin/sail artisan report <start_date> <end_date>
   ```

   Replace `<start_date>` and `<end_date>` with the desired date range in `YYYY-MM-DD` format.
2. **Queue Processing**:
   Ensure the queue worker is running to process the job:

   ```bash
   ./vendor/bin/sail artisan queue:work
   ```
3. **Generated File**:
   The Excel file will be saved with a name like `usersreport-<timestamp>.xlsx` in your configured MinIO storage bucket.

## Example Workflow

1. Trigger the command:
   ```bash
   ./vendor/bin/sail artisan report 2025-01-01 2025-01-15
   ```
2. The job processes the date range and generates the Excel file.
3. The file is stored in MinIO, accessible via your configured bucket.

## Development Notes

- MinIO is used to mimic AWS S3 functionality, making it easier to test and develop locally.

## Contributing

Feel free to fork this repository and submit pull requests. Ensure your contributions adhere to the Laravel coding standards.

Enjoy working with this Laravel Sail project and generating reports seamlessly!
