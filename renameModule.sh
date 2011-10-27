#/bin/bash
oldName=$1
newName=$2

u=$(tr '[a-z]' '[A-Z]'<<<"${newName:0:1}")
newNameUpper="${u}${newName:1}"
u=$(tr '[a-z]' '[A-Z]'<<<"${oldName:0:1}")
oldNameUpper="${u}${oldName:1}"

sed -i 's/'$oldName'/'$newName/'g' *.php
sed -i 's/'$oldNameUpper'/'$newNameUpper'/g' *.php

sed -i 's/'$oldName'/'$newName/'g' ./presenters/*.php
sed -i 's/'$oldNameUpper'/'$newNameUpper'/g' ./presenters/*.php

cd ..
mv $oldNameUpper'Module' $newNameUpper'Module'
