# IntSplice2 (hg19/hg38)
## Abstract
IntSplice predicts a splicing consequence of a single nucleotide variation (SNV) at intronic positions -50 to -3 close to the 3' end of an intron of the human genome. Compared to our previous ver. 1.x that was modeled by Support Vector Machine (SVM), ver. 2.0 used a newly built training dataset that included 54% more pathogenic and common SNVs, and was modeled by Gradient Boosting (GB).
## Materials and Methods
1. A total of 1,787 pathogenic SNVs located from intronic positions -50 to -3 according to the transcript annotations of Ensembl release 101 were extracted from the Human Gene Mutation Database (HGMD) Professional release 2020/04 with mutation category DM (disease-causing mutation) and ClinVar release 2021/03/15 with CLNVC = single_nucleotide_variant and intron_variant, and CLNSIG = Pathogenic on human genome assembly GRCh38/hg38.
2. A total of 5,406 common SNVs with a minor allele frequency (MAF) between 0.01 and 0.50 located at the same positions as pathogenic SNVs were extracted from the dbSNP build 151. Among them, 1,787 common SNVs were randomly selected.
3. A total of 110 features representing splicing cis-elements were used to make gradient boosting (GB) models with a machine learning library, Optuna and LightGBM, on Python version 3.8.
4. To achieve quick response, all possible SNVs located from intronic positions -50 to -3 on the human genome were pre-processed by IntSplice ver. 2.0. The web service program extracts scores from the pre-processed dataset.
## Publication
Please cite: Jun-ichi Takeda, Sae Fukami, Akira Tamura, Akihide Shibata, and Kinji Ohno. “IntSplice2: Prediction of the Splicing Effects of Intronic Single-Nucleotide Variants Using LightGBM Modeling” Front Genet. 2021 Jul 19;12:701076 ([PMID: 34349788](https://pubmed.ncbi.nlm.nih.gov/34349788/)).
## Related tools
[InMeRF (hg38)](https://github.com/jtakeda-tokai/inmerf_hg38.git)\
[InMeRF (hg19)](https://github.com/jtakeda-tokai/inmerf_hg19.git)\
[FexSplice (hg19/hg38)](https://github.com/jtakeda-tokai/fexsplice.git)
