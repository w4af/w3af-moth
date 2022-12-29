#!/bin/bash

sudo rm -rf w4af/audit/file_upload/uploads/*
sudo rm -rf w4af/audit/dav/write-all/*
sudo git checkout w4af/audit/ssi/messages.shtml
sudo git checkout w4af/audit/xss/stored/data.txt
sudo chmod 777 w4af/audit/ssi/messages.shtml
sudo chmod 777 w4af/audit/xss/stored/data.txt

git status

