# Content & Brand Values Scanning Rules

This document outlines the rules, metrics, and heuristics used by the **Content Insights** and **Brand Values** engines. Use this as a reference or prompt guide to write copy that deliberately passes or fails these checks.

## 1. Reading Level & Complexity
The scanner calculates the overall reading complexity using the **Flesch-Kincaid Grade Level** formula, alongside NLP heuristics for sentence and word complexity.

* **High Reading Level** (`reading-level-high`):
  * **Rule:** If the overall Flesch-Kincaid grade level exceeds **9** (roughly equivalent to lower secondary education).
  * **Failure Example:** Long, winding sentences packed with multi-syllable words. ("The obfuscation of the methodology necessitates an amalgamation of multidisciplinary paradigms.")
  * **Pass Example:** Short sentences. Common words. ("We use different methods to solve this problem.")
  * **Technical Details:** Uses the `flesch-kincaid` and `syllable` npm packages to compute the exact grade level based on word, sentence, and syllable counts.

* **Sentence Readability** (`coga-readability`):
  * **Rule:** Flags sentences that are structurally too hard to read (e.g., too many clauses, overly long).
  * **Technical Details:** Evaluated via the `retext-readability` plugin (based on Dale-Chall and Spache formulas internally for English text).

* **Complex Vocabulary** (`coga-simplify`):
  * **Rule:** Flags jargon and unnecessarily complex words, suggesting simpler alternatives.
  * **Failure Example:** "utilize", "facilitate", "in close proximity to"
  * **Pass Example:** "use", "help", "near"
  * **Technical Details:** Evaluated via the `retext-simplify` plugin.

## 2. Clarity & Style
These rules enforce clear, direct, and engaging copywriting.

* **Passive Voice** (`coga-passive`):
  * **Rule:** Flags instances of passive voice, recommending active voice.
  * **Failure Example:** "The report was written by the team."
  * **Pass Example:** "The team wrote the report."
  * **Technical Details:** Evaluated via the `retext-passive` plugin.

* **Intensifiers & Weasel Words** (`coga-intensify`):
  * **Rule:** Flags weak, mitigating, or filler words that dilute the impact of a sentence.
  * **Failure Example:** "We *actually* think this is *very* good, *basically*."
  * **Technical Details:** Evaluated via the `retext-intensify` plugin.

* **Clichés** (`coga-cliches`):
  * **Rule:** Detects overused phrases and idioms that harm clarity.
  * **Failure Example:** "At the end of the day", "low-hanging fruit", "think outside the box".
  * **Technical Details:** Evaluated via a custom wrapper around the `no-cliches` npm package.

* **Word Overuse** (`coga-overuse`):
  * **Rule:** Flags repetitive use of the same word within close proximity.
  * **Technical Details:** Evaluated via the `retext-overuse` plugin.

## 3. Inclusivity & Safety
Ensures the copy is appropriate and accessible to a diverse audience.

* **Inclusive Language** (`coga-equality`):
  * **Rule:** Flags insensitive, non-inclusive, or potentially offensive language (gendered terms, ableist language).
  * **Failure Example:** "businessman", "crazy", "man-hours"
  * **Pass Example:** "business person", "wild", "work hours"
  * **Technical Details:** Evaluated via the `retext-equality` plugin.

* **Profanity** (`coga-profane`):
  * **Rule:** Flags inappropriate or profane language.
  * **Technical Details:** Evaluated via the `retext-profanities` plugin.

* **Language Mismatch** (`language-mismatch`):
  * **Rule:** Detects the primary language of the text and compares it to the declared `<html lang="...">` attribute.
  * **Failure Example:** Writing Spanish text on a page with `<html lang="en">`. 
  * **Technical Details:** Evaluated using the `franc` npm package for n-gram based language detection (returning ISO 639-3 codes which are mapped to ISO 639-1).

## 4. Brand Values Resonance
The scanner measures how well your copy aligns with specific brand values using a custom dictionary and thesaurus (stemming).

* **Core Keyword Match**:
  * **Rule:** Flags exact dictionary matches for your brand value keywords. 
  * **Example:** If a core value is "Innovation", using the exact word "innovation" counts as a direct hit and raises the resonance score.

* **Synonym / Upgrade Opportunity**:
  * **Rule:** Flags words that are *synonyms* or related terms to your core brand values.
  * **Example:** If a core value is "Innovation", writing "creative" or "inventive" will be flagged. The system suggests upgrading these words to your actual core brand value to strengthen thematic resonance.

* **Technical Details:** 
  * Powered by the Unified ecosystem (`unified`, `retext-english`).
  * Utilizes a custom `retext-values` plugin built specifically for the audit engine. It parses the AST to perform direct matching of the core brand value dictionaries, and automatically builds stemmed representations (using the `stemmer` package) to match synonyms and expanded vocabulary dynamically.
