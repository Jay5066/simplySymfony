---
    # Builtin values
    references:
        - references.md
        - abbreviations.md
        - footnotes.md

    destination: destination.html

    # Meta Data
    title: Test Page
    author:
        - John Doe
        - Jane Doe

    # Settings overrides
    settings:
        enabled_extensions:
        - extra
        - github
        - toc
        - headerid
        - smarty(smart_quotes=False) # smart quotes interferes with attr_list
        - meta
        - wikilinks
        - admonition
        - codehilite(guess_lang=False,pygments_style=github)
---