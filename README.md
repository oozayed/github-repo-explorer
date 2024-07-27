# GitHub Repo Explorer

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/oozayed/github-repo-explorer.git
   ```

2. Navigate to the project directory:
   ```bash
   cd github-repo-explorer
   ```

3. Install dependencies:
   ```bash
   composer install
   ```

4. Set up environment variables:
   ```bash
   cp .env.example .env
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Serve the application:
   ```bash
   php artisan serve
   ```

## Usage

Visit `http://localhost:8000` and use the form to get popular repositories.

## Running Tests

```bash
php artisan test
