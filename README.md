# Starting  the Project[¶](https://ddev.readthedocs.io/en/stable/users/project/#starting-a-project "Permanent link")

## Installing DDEV
DDEV is an open source tool for launching local web development environments in minutes.

Once you’ve [installed a Docker provider](https://ddev.readthedocs.io/en/stable/users/install/docker-installation/), you’re ready to install DDEV!
- [macOS installation](https://ddev.readthedocs.io/en/stable/users/install/ddev-installation/)
- [Linux installation](https://ddev.readthedocs.io/en/stable/users/install/ddev-installation/#__tabbed_1_2)

Once [DDEV is installed](https://ddev.readthedocs.io/en/stable/users/install/ddev-installation/), setting up the project should be quick:

1. Clone the code for your project.
2. From the project root, run the following commands:

```
# Spin up the project.
ddev start

# Import the sample database.
ddev import-db --file=.ddev/import-db/db.sql.gz

# Run composer commands and generate a sign in link using drush.
ddev update
```


## Viewing the project

The project consists of two paths:

`/date-form-from-controller`

This approach involves creating a form class and then using a controller to render that form. This method of creating forms is typically used when you need more control and flexibility, especially for complex forms or when integrating with other business logic.

`/date-form`

This approach involves creating a form class and defining it directly in the routing file. This approach is supported by Drupal's routing system and is ideal when you want simplicity and your form handling logic is straightforward.
