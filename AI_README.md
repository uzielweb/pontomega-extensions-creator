# AI Context & Instructions - Pontomega Extensions Creator

## 🧠 Project Overview
**Pontomega Extensions Creator** is a native Joomla 6 component (`com_extensionscreator`) that generates boilerplates for other Joomla extensions. It is designed to run on Joomla 5.x and 6.x.

## 🏗️ Technical Architecture
-   **Framework**: Joomla CMS (Native MVC).
-   **Namespace**: `Pontomega\Component\ExtensionsCreator`.
-   **Dependency Injection**: Fully implemented via `admin/services/provider.php`.
-   **Frontend**: Bootstrap 5 (Native Joomla 4/5/6 styling).

## 📂 Directory Structure (Generic Map)
-   `extensionscreator.xml`: Main manifest.
-   `updates.xml`: Update server definition.
-   `test_gen.php`: **CRITICAL**. CLI script to verify generation logic without installing the component.
-   `admin/`:
    -   `services/`: DI Container configuration.
    -   `src/`: PHP Classes (PSR-4).
        -   `Controller/`: Handles input (Display, Generate).
        -   `Generator/`: **Core Logic**. Classes that replace placeholders and write files.
        -   `Helper/`: Utilities (e.g., `ZipHelper`).
    -   `tmpl/`:
        -   `dashboard/`, `component/`: Backend UI Views.
        -   `generator/`: **SKELETONS**. These are the template files copied to generate new extensions.
    -   `language/`: `en-GB` and `pt-BR` INI files.

## ⚙️ Development Flow (Start to Finish)

### 1. Understanding the Logic
The core logic resides in `admin/src/Generator/`.
-   `ComponentGenerator.php`: Handles generating components.
-   `ModuleGenerator.php`: Handles modules.
-   Etc.

These classes read files from `admin/tmpl/generator/[type]`, replace `{{placeholders}}` (like `{{element}}`, `{{namespace}}`), and write them to the output buffer/zip.

### 2. Modifying the Output (Boilerplates)
If you want to change the *code that is generated* (e.g., add a method to the generated controller):
-   **DO NOT** edit `src/Generator`.
-   **EDIT** `admin/tmpl/generator/[type]/path/to/file.php`.

### 3. Testing (Verification)
**Always** use the CLI script before testing in a live Joomla site.
```bash
php test_gen.php
```
This script acts as a mock Joomla environment. It generates extensions into `admin/output/` and verifies if they zip correctly.
-   If `test_gen.php` fails, the feature is broken.
-   If `test_gen.php` passes, verify the contents of `admin/output/`.

### 4. Localization
-   Alwys use `JText::_('KEY')` in PHP files.
-   Add keys to:
    -   `admin/language/en-GB/com_extensionscreator.ini`
    -   `admin/language/pt-BR/com_extensionscreator.ini`

### 5. Release Workflow
1.  **Bump Version**: Update `<version>` in `extensionscreator.xml` and `updates.xml`.
2.  **Commit**: `git commit -m "Bump version to X.Y.Z"`.
3.  **Tag**: `git tag vX.Y.Z`.
4.  **Push**: `git push origin master --tags`.
5.  **Release**: Create a GitHub Release linked to the tag.

## 🤖 AI Rules & Conventions
1.  **Joomla Standards**: Follow PSR-12 and Joomla coding standards.
2.  **No Legacy**: Do not use `JModelLegacy`, `JFactory`, etc. Use DI and `MVCFactory`.
3.  **Security**: Inspect `manifest` files for security issues.
4.  **Idempotency**: The `test_gen.php` script handles cleanup locally, but ensure generators can overwrite if needed.
