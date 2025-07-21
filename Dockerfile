FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    zip \
    libsqlite3-dev \
    sqlite3

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install

# Expose port and run built-in PHP server
EXPOSE 8080
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]