# Damascus Way Website
## Version 2018.11.17
Senior group project for CSC 450 relating to the Damascus Way software replacement.

Please read style guide below to maintain code normalcy

## To Do:
See Jira Project for more information


### Style Guide
Please comment your code :)

Please be aware of the differences between getcwd() and \__DIR\__ 
Vs using $_SERVER['HOME'] as they can cause changes in the behavior of the web files

Below is the current folder structure for ease of reference.
* api - for mobile interaction file
* android-connect - duplicate api folder for localhost work
* img - for all images,
* lib - for any php files that are not specifically a page
   * func - for functions that are not specifically rendered pages or page items
   * include - for rendered items such as menus, footer, head, libraries, etc.
* pages - for rendered pages
* script - for all things JavaScript
* style - For all CSS files.  

## Uploading guidelines
Please be certain to NOT transfer project files to the website such as .gitignore or .idea folders
