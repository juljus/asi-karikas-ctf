# Asi Karikas CTF repo

Jagatud kaheks osaks: `CTFid` ja `kataloog`. Esimene sisaldab CTFide lahendusi, teine on frontend CTFidele ligipääsuks (ssg site).

## Install

```bash
git clone https://github.com/juljus/asi-karikas-ctf.git
cd asi-karikas-ctf
docker compose build
docker compose up db
cd kataloog
npm run db:push
```

## Run

```bash
docker compose up -d --build
```

## CTFid

[Google Docs](https://docs.google.com/document/d/1P4B2VI9qfXhXyMlchFt38WpdP6OBA5cSyffv5AL9Qrc/edit?tab=t.0)
