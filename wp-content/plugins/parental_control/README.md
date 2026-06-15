# Parental Control WordPress Plugin

A comprehensive WordPress plugin for managing content access permissions for child users based on age groups, genres, and content warnings.

## Features

- **Parent-Child User Roles**: Create parent accounts that manage child accounts
- **Content Categorization**: Tag posts with age groups (3+, 5+, 13+, 18+), genres, and content warnings
- **Permission Management**: Parents can set granular permissions for each child
- **Content Filtering**: Automatic filtering of posts based on child permissions
- **Admin Dashboard**: Monitor parents, children, and configured accounts
- **Internationalization**: Full support for English and Persian

## Installation

1. Download or clone the plugin into `/wp-content/plugins/parental_control/`
2. Activate the plugin from WordPress admin dashboard
3. Navigate to **Settings > Parental Control** to configure plugin options
4. Create age groups, genres, and content warnings in **Settings > PCPC Tags**

## Usage

### Creating Parents

1. Go to **Users > Add New**
2. Assign the **Parent** role
3. Parents can then manage child users through their profile page

### Creating Children

1. A parent user can create child accounts through their dashboard
2. Assign age-appropriate permissions to each child
3. Children will see only content matching their permissions

### Content Management

1. When creating or editing posts, assign:
   - **Age Group**: Minimum age group the content is appropriate for
   - **Genre**: Content category (Educational, Science Fiction, etc.)
   - **Content Warnings**: Any content warnings (Violence, Language, etc.)

2. The plugin automatically filters posts based on:
   - Child must have permission for at least one assigned age group
   - Child must have permission for at least one assigned genre
   - Child cannot have any blocked content warnings

### Settings

- **Max Children Per Parent**: Maximum number of children a parent can manage
- **Parent Login Redirect**: Where parents are sent after login
- **Child Login Redirect**: Where children are sent after login
- **Plugin Pages URLs**: Set URLs for parent profile, child profile, password change

## Architecture

```
parental-customers-plugin.php     - Main plugin file with hooks
inc/Init.php                      - Service registration and initialization
inc/I18n.php                      - Translation utilities
inc/Base/
  ├── BaseController.php          - Base class for all controllers
  ├── AdminDashboard.php          - Admin dashboard display
  ├── SettingsController.php      - Settings pages and options
  ├── TaxonomyController.php      - Age groups, genres, warnings taxonomy
  ├── PermissionController.php    - Permission UI and AJAX handlers
  ├── ContentFilter.php           - Query filtering for post access
  ├── ParentController.php        - Parent user management
  ├── ChildController.php         - Child user management
  └── Enqueue.php                 - Script and style enqueueing
templates/
  ├── parent-profile.php          - Parent dashboard template
  └── child-profile.php           - Child profile template
assets/
  ├── dashboard.css               - Dashboard styling
  ├── parent_form.js              - Parent registration form
  ├── parent_profile.js           - Parent profile functionality
  └── child_permisions.js         - Permission UI interactions
languages/
  ├── parental-customer-plugin.pot - Translation template
  └── parental-customer-plugin-fa_IR.po - Persian translations
```

## Custom Taxonomies

### Age Groups
- **3+**: Content for ages 3 and up
- **5+**: Content for ages 5 and up
- **13+**: Content for ages 13 and up
- **18+**: Content for ages 18 and up

### Genres
Educational, Science Fiction, Horror, Comedy, Drama, Adventure, Documentary, Animation

### Content Warnings
Violence, Language, Sexual Content, Drug Use, Scary/Intense

## User Roles & Capabilities

### Parent Role
- Can manage their child accounts
- Can set content permissions for children
- Can view parent dashboard
- Redirects to parent profile after login

### Child Role
- Can view permitted content
- Cannot manage permissions
- Automatic content filtering based on parent settings
- Redirects to home page after login

## Testing

### Create Test Posts
Run the test post creation script:
```php
// Access from WordPress admin area
// File: create-parental-control-test-data.php in site root
```

This creates sample posts with various tag combinations for testing filtering.

### Test Workflow
1. Create parent account
2. Create child account (linked to parent)
3. Parent assigns permissions to child
4. Log in as child and verify correct posts are visible
5. Check admin dashboard for proper statistics

## Permissions System

The plugin uses a whitelist approach for security:

**A child can view a post if:**
- Post has at least one age group AND child has permission for that age group, AND
- Post has at least one genre AND child has permission for that genre, AND
- Post does NOT have any content warnings that the parent blocked

**OR if:**
- Post has no age groups, genres, or warnings assigned (public content)

## Hooks & Filters

### Actions
- `admin_menu` - Registers admin dashboard menu
- `wp_ajax_pcpc_get_child_permissions` - AJAX: Get child permissions
- `wp_ajax_pcpc_save_tag_permissions` - AJAX: Save child permissions
- `wp_ajax_pcpc_register_parent` - AJAX: Register parent user
- `wp_ajax_pcpc_register_child` - AJAX: Register child user

### Filters
- `posts_where` - Filter posts based on child permissions
- `the_content` - Restrict content display

## Security

- All AJAX requests use WordPress nonces (`check_ajax_referer`)
- All user input is sanitized with `sanitize_text_field()`, `sanitize_email()`, `intval()`
- Permissions are validated server-side
- Parent ownership of child accounts is verified before allowing modifications

## Browser Compatibility

Works with modern browsers supporting ES6 JavaScript and CSS Grid.

## License

This plugin is provided as-is for personal use.

## Support

For issues and feature requests, please refer to the GitHub repository documentation.
