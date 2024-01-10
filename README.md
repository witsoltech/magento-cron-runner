# Magento Cron Runner Extension by WitSol Technologies

![Magento Version](https://img.shields.io/badge/Magento-2.4.x-brightgreen.svg)
![PHP Version](https://img.shields.io/badge/PHP-8.x-blue.svg)
![License](https://img.shields.io/badge/License-MIT-orange.svg)

## Overview

Cron Runner is a Magento extension developed by WitSol Technologies that provides a user-friendly interface to manage and run cron jobs directly from the Magento backend. This extension simplifies the process of scheduling and monitoring cron tasks, making it more accessible for store administrators.

## Features

- **Backend Cron Management:** Run and manage cron jobs directly from the Magento Admin Panel.
- **User-Friendly Interface:** Intuitive interface for easy scheduling and monitoring of cron tasks.
- **Schedule Configuration:** Set up cron job schedules and parameters effortlessly.
- **Detailed Logs:** View detailed logs of cron job executions for monitoring and troubleshooting.
- **Compatibility:** Compatible with Magento 2.x and PHP 7.x.

## Installation

### Composer Installation

```bash
php bin/magento module:enable WitSol_CronRunner
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
