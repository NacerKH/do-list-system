# How to run Vue.js and Laravel using Docker Compose

This repository contains a boilerplate setup for running a Vue.js frontend and Laravel backend using Docker Compose.

## Prerequisites

Make sure you have Docker and Docker Compose installed on your system.

## Getting started

1. Clone this repository to your local machine.
2. In the root directory of the project, create a `.env` file and fill in the required environment variables, such as database credentials and app key. You can use the `.env.example` file as a template.
3. Open a terminal window and navigate to the project directory.
4. Run `docker-compose up --build -d ` to start the containers.
5. Open your web browser and go to `http://localhost:6009/` to see the Vue.js frontend running.
6. To access the Laravel backend, go to `http://localhost:6009/api`.

## Available scripts

In the project directory, you can run the following Docker Compose commands:

### `docker-compose up`

Starts the containers and displays the logs in the terminal window.

### `docker-compose down`

Stops and removes the containers.

### `docker-compose exec <service_name> <command>`

Runs a command inside a running container. For example, to run `php artisan migrate` inside the Laravel container, run `docker-compose exec todo-list php artisan migrate`.
## Available API

## APIs

The following APIs are available in the Laravel backend:

### Task API

- **GET /api/tasks**: Retrieves all tasks.
- **POST /api/tasks**: Creates a new task.
- **GET /api/tasks/{id}**: Retrieves a specific task by ID.
- **PUT /api/tasks/{id}**: Updates a specific task by ID.
- **DELETE /api/tasks/{id}**: Deletes a specific task by ID.

### CONTAINER API

- **GET /api/containers**: Retrieves all containers.
- **POST /api/containers**: Creates a new container.
- **GET /api/containers/{id}**: Retrieves a specific container by ID.
- **PUT /api/containers/{id}**: Updates a specific container by ID.
- **DELETE /api/containers/{id}**: Deletes a specific container by ID.

![ GIF](https://github.com/khalifa-dv/do-list-system/blob/main/public/kaliTodo.gif)
