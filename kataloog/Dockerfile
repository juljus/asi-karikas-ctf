FROM node:22-alpine AS builder
ARG DATABASE_URL
ENV DATABASE_URL $DATABASE_URL
WORKDIR /app
COPY package*.json ./
#COPY .env ./
RUN npm ci
COPY . .
RUN npm run build
RUN npm prune --production
RUN npm run db:push --force

FROM node:22-alpine
ARG DATABASE_URL
ENV DATABASE_URL $DATABASE_URL
WORKDIR /app
COPY --from=builder /app/build ./build
COPY --from=builder /app/node_modules node_modules/
COPY package.json .
#COPY --from=builder .env .
EXPOSE 4173
ENV NODE_ENV=production
ENV PORT=4173
CMD ["node", "build"]