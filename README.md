# Asi Karikas CTF repo

Veebileht on saadaval: [ctf.hen.ee](https://ctf.hen.ee/)

Jagatud kaheks osaks: `CTFid` ja `kataloog`. Esimene sisaldab CTFide lahendusi, teine on frontend CTFidele ligipääsuks (ssg site).

## Install

Muuda compose faili env väärtused vastavalt.

```bash
docker compose up -d db
cd kataloog
npm run db:push
docker compose build
```

## Run

```bash
docker compose up -d db
docker compose up -d --build
```

CTFid on saadaval: [localhost:8090](http://localhost:8090/)

Kataloog on saadaval: [localhost:4173](http://localhost:4173/)