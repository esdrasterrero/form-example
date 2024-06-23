# Setup

## Installing the module

1. **Open Terminal**: Open your terminal or command prompt.
2. **Navigate to Your Drupal Root Directory**: Change to the directory where your Drupal installation is located.
3. **Enable the Module**: Use the `drush en` command followed by the module's machine name.
   ```sh
   drush en form_example
   ```

## Viewing the module output

The project consists of two paths:

`/date-form-from-controller`

This approach involves creating a form class and then using a controller to render that form. This method of creating forms is typically used when you need more control and flexibility, especially for complex forms or when integrating with other business logic.

`/date-form`

This approach involves creating a form class and defining it directly in the routing file. This approach is supported by Drupal's routing system and is ideal when you want simplicity and your form handling logic is straightforward.
