#!/bin/bash
set -e
cd nginx && docker-compose up
cd ../php && docker-compose up

