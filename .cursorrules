# AI Rules & Context - Pontomega Extensions Creator

## 🧠 Project Overview
**Pontomega Extensions Creator** is a native Joomla 6 component (`com_extensionscreator`) that generates boilerplates for other Joomla extensions.

## 🏗️ Technical Architecture
-   **Framework**: Joomla CMS (Native MVC).
-   **Namespace**: `Pontomega\Component\ExtensionsCreator`.
-   **Dependency Injection**: `admin/services/provider.php`.
-   **Frontend**: Bootstrap 5 (Native Joomla 4/5/6 styling).

## 📂 Key Files
-   `extensionscreator.xml`: Main manifest.
-   `test_gen.php`: **CRITICAL**. CLI script to verify generation logic. Run `php test_gen.php` after changes to generators.
-   `admin/src/Generator/`: Core logic classes.
-   `admin/tmpl/generator/`: Skeleton templates (with `{{placeholders}}`).

## ⚙️ Development Rules
1.  **Joomla Standards**: Follow PSR-12 and Joomla coding standards.
2.  **No Legacy**: Do not use `JModelLegacy`, `JFactory`. Use DI and `MVCFactory`.
3.  **Localization**: Always use `Joomla\CMS\Language\Text::_('KEY')`.
4.  **Testing**: Always run `php test_gen.php` to verify changes.
5.  **Release Workflow**:
    -   Bump version in `extensionscreator.xml` and `updates.xml`.
    -   Commit -> Tag (vX.Y.Z) -> Push -> Release.

## 🤖 Instructions for AI Agents
-   When modifying generators, EDIT THE TEMPLATES in `admin/tmpl/generator/`, not the generator logic (unless logic changes).
-   When adding new features, update `test_gen.php` to cover them.
