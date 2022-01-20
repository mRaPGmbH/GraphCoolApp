# How to get started:

Create a new project: \
`composer create-project --prefer-dist mrapgmbh/graphcoolapp myApp` 

Check and update following files in your new project:
* `.env.local` - app name, database name+user+pwd
* `docker-compose.yml` - port, database name+user+pwd

Then create a .env file: \
`cp .env.local .env`

Create a public key for JWT: \
`cp jwtkey-public-staging.pem jwtkey-public.pem`

Build and start your container: \
`docker-compose up --build`