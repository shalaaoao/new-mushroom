#!/bin/bash
# 一次性处理git提交
branch_name=$(git symbolic-ref --short -q HEAD)
if [ ! -n "$1" ] ;then
commit="fix bug"
else
commit=$1
fi
git add .
git commit -m "$commit"
git push origin "$branch_name"