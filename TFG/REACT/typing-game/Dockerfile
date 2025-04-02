# Etapa 1: Construir la app de React
FROM node:18 AS build

WORKDIR /app

ENV PATH /app/node_modules/.bin:$PATH
COPY package.json .
COPY package-lock.json .
RUN npm install

COPY . .

RUN chmod +x node_modules/.bin/vite

EXPOSE 3000
ENV HOST=0.0.0.0

CMD ["npm", "run", "dev"]