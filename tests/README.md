# PHP tests

Run from the repository root with PHP 8.0 or later, SimpleXML, and DOM enabled.
First download the two standalone schemas used by the project's XML files:

```sh
mkdir -p .tmp/schemas/3.2
curl --fail --location https://rudnerbjoern.github.io/iTop-schema/extension.xsd -o .tmp/schemas/extension.xsd
curl --fail --location https://rudnerbjoern.github.io/iTop-schema/3.2/itop_design.xsd -o .tmp/schemas/3.2/itop_design.xsd
```

PowerShell alternative:

```powershell
New-Item -ItemType Directory -Force .tmp/schemas/3.2 | Out-Null
Invoke-WebRequest https://rudnerbjoern.github.io/iTop-schema/extension.xsd -OutFile .tmp/schemas/extension.xsd
Invoke-WebRequest https://rudnerbjoern.github.io/iTop-schema/3.2/itop_design.xsd -OutFile .tmp/schemas/3.2/itop_design.xsd
```

Alternatively, set `ITOP_SCHEMA_DIR` to an existing iTop-schema checkout containing
`extension.xsd` and `3.2/itop_design.xsd`. Then run:

```sh
php tests/run.php
```

On Windows, use the same command with `php.exe` if needed.
No Composer packages, database, or iTop installation are required.
The runner prints each result and exits with `0` on success or `1` on failure.

For every PR targeting `main`, CI sets up PHP 8.3 with DOM and SimpleXML,
downloads both schemas into `.tmp/schemas`, and runs the same command.
The required `PR checks` job also requires this test job to succeed; a schema
download failure fails the job. Push-only runs continue to run Gitleaks only.
For `release/*` PRs, CI also validates the `release/X.Y.Z` branch name against
the manifest and module versions, and includes that result in `PR checks`.

The module tests check class inheritance, core/probe and CI assignments, host and
IP filters, monitoring status values, UI fields, dashboard entries, dictionary
coverage, and module registration with its declared dependencies. Minimal
`SetupWebPage` and `Dict` substitutes capture the real PHP registrations.
Add module checks to `monitoring.php`.

Two additional tests validate the manifest and data model against the local XSDs.
Missing schemas fail the tests with setup instructions. Tests run offline after
setup; refresh the cached schemas explicitly when needed. Results apply to the
schema versions present locally.

These tests do not test iTop model compilation, OQL execution, persistence,
or installation. Run the test kit only against trusted local project code.
Fork PRs use the same read-only test workflow without repository secrets.
GitHub repository policies may require a maintainer to approve a fork workflow.
