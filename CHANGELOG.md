# Changelog

## 2.0.0 - 2021-11-07

### Changed

- **[BC-Break]** Changed events from implementing methods to instead use PHP attributes. This transforms the event 
  classes to plan data objects without any logic. Serialisation logic has been moved to a separate `Serializer` class.

## 1.0.0 - 2021-09-24

- Initial release of the library.
