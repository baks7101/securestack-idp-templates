# Stage 1: build stage for Composer dependencies.
FROM composer:2 AS build
WORKDIR /app
COPY . .
RUN composer install --no-dev --no-interaction --optimize-autoloader || true

# Stage 2: minimal runtime image.
FROM php:8.3-cli-alpine AS runtime

# Non-root user for security.
RUN addgroup -S appgroup && adduser -S appuser -G appgroup

WORKDIR /app
COPY --from=build /app /app
USER appuser

EXPOSE 8080
CMD ["php", "-S", "0.0.0.0:8080", "index.php"]
