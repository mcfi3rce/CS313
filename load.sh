#!/bin/sh

git add .
read -p "Commit message: " desc
git commit -m "$desc"
git push heroku master

