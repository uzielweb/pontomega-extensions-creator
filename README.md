# Pontomega Extensions Creator (Joomla 6)

**Pontomega Extensions Creator** is a native **Joomla 6** component (compatible with Joomla 5.x) that streamlines the creation of boilerplates for new Joomla extensions.

It allows you to generate full MVC components, modules, plugins, and templates directly from the Joomla backend, following modern Joomla development standards (Services, Namespaces, Dependency Injection).

## 🚀 Features

-   **Component Generator**: Creates full MVC components.
    -   **Multiple Views** support (Dashboard, Lists, Items).
    -   **Table Scaffolding** (Ready-to-use `Table` classes).
    -   **Configurable Vendor Namespace** (e.g., `MyCompany\Component\MyComponent`).
-   **Module Generator**: Creates Site and Admin modules.
-   **Plugin Generator**: Supports all plugin groups (System, Content, User, etc.).
-   **Template Generator**: Basic structure for templates.
-   **Auto Download**: Generates a ready-to-install `.zip` file.

## 📦 Installation

1.  Clone this repository or download the zip.
2.  Zip the component folder and install via **System -> Extensions -> Install**.
3.  Or, if developing locally, use the "Discover" feature in the extensions manager.

## 🛠️ Usage

Go to **Components -> Pontomega Extensions Creator** in the admin menu.

### Creating a New Component

1.  **Element**: Enter the technical name, e.g., `com_myproject`.
2.  **Vendor Namespace**: Define your vendor namespace (e.g., `Acme`). Result: `Acme\Component\Myproject`.
3.  **Views**: List the views you need, comma-separated.
    *   Example: `dashboard, products, categories`.
    *   This creates the folder structure and classes for each view in `src/View`.
4.  **Tables**: List database tables to scaffold classes for.
    *   Example: `products, categories`.
    *   This creates `ProductsTable` and `CategoriesTable` classes in `src/Table`.
5.  Click **Generate & Download**. The zip will be downloaded automatically.

### Development Tips

*   **MVC Pattern**: Generated code strictly follows Joomla 4/5/6 container and service patterns. No legacy `JModelLegacy` classes.
*   **Services**: The `services/provider.php` file is auto-generated, configuring `MVCFactory` and `ComponentDispatcher`.
*   **Customization**: The creator provides a boilerplate. After installation, you can edit the generated files as needed.

## 📂 Project Structure

*   `admin/src/Generators`: File generation logic.
*   `admin/tmpl/generator`: Templates (skeletons) used to create PHP/XML files.
*   `test_gen.php`: CLI test script to verify generation without installing the component.

## 📝 License

This project is licensed under **GPL v2 or later**.
