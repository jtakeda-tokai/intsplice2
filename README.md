# IntSplice2 (hg19/hg38)
### :warning: This site temporarily stores data for the web service ([IntSplice2](https://www.med.nagoya-u.ac.jp/neurogenetics/IntSplice2/)), which is currently unavailable.
## Abstract
IntSplice predicts a splicing consequence of a single nucleotide variation (SNV) at intronic positions -50 to -3 close to the 3' end of an intron of the human genome. Compared to our previous ver. 1.x that was modeled by Support Vector Machine (SVM), ver. 2.0 used a newly built training dataset that included 54% more pathogenic and common SNVs, and was modeled by Gradient Boosting (GB).
## Materials and Methods
1. A total of 1,787 pathogenic SNVs located from intronic positions -50 to -3 according to the transcript annotations of Ensembl release 101 were extracted from the Human Gene Mutation Database (HGMD) Professional release 2020/04 with mutation category DM (disease-causing mutation) and ClinVar release 2021/03/15 with CLNVC = single_nucleotide_variant and intron_variant, and CLNSIG = Pathogenic on human genome assembly GRCh38/hg38.
2. A total of 5,406 common SNVs with a minor allele frequency (MAF) between 0.01 and 0.50 located at the same positions as pathogenic SNVs were extracted from the dbSNP build 151. Among them, 1,787 common SNVs were randomly selected.
3. A total of 110 features (Table 1) representing splicing cis-elements were used to make gradient boosting (GB) models with a machine learning library, Optuna and LightGBM, on Python version 3.8 (Figure 1).
4. To achieve quick response, all possible SNVs located from intronic positions -50 to -3 on the human genome were pre-processed by IntSplice ver. 2.0. The web service program extracts scores from the pre-processed dataset (see download folder).

Table 1. List of 110 features.
    <table border="1" cellspacing="0">
      <tr>
        <th>Features</th>
        <th>3'/Ex/5'</th>
        <th>Position</th>
      </tr>
      <tr>
        <td>Best branchpoint sequence (BPS)-related <b>x3</b></td>
        <td>3'</td>
        <td>Int-50 to Int-3</td>
      </tr>
      <tr>
        <td>Polypyrimidine (PPT)-related <b>x10</b></td>
        <td>3'</td>
        <td>Int-50 to Int-3</td>
      </tr>
      <tr>
        <td>Best BPS-PPT-related <b>x6</b></td>
        <td>3'</td>
        <td>Int-50 to Int-3</td>
      </tr>
      <tr>
        <td>Nucleotide at Int-3 <b>x4</b></td>
        <td>3'</td>
        <td>Int-3</td>
      </tr>
      <tr>
        <td>1st nucleotide of exon <b>x4</b></td>
        <td>Ex</td>
        <td>Ex+1</td>
      </tr>
      <tr>
        <td>Presence of A or G at Int-7, Int-6, or Int-5</td>
        <td>3'</td>
        <td>Int-7 to Int-5</td>
      </tr>
      <tr>
        <td>Ratio of purines (A/G) at Int-20 to Int-8</td>
        <td>3'</td>
        <td>Int-20 to Int-8</td>
      </tr>
      <tr>
        <td>Number of G nucleotides at Int-12 to Int-3</td>
        <td>3'</td>
        <td>Int-12 to Int-3</td>
      </tr>
      <tr>
        <td>Number of GGG trinucleotides at Int-12 to Int-3</td>
        <td>3'</td>
        <td>Int-12 to Int-3</td>
      </tr>
      <tr>
        <td>SD-Score</td>
        <td>Ex/5'</td>
        <td>Ex-3 to Int+6</td>
      </tr>
      <tr>
        <td>Exon length</td>
        <td>Ex</td>
        <td>Ex</td>
      </tr>
      <tr>
        <td>MaxEntScan::score3ss</td>
        <td>3'/Ex</td>
        <td>Int-20 to Ex+3</td>
      </tr>
      <tr>
        <td>MaxEntScan::score5ss</td>
        <td>Ex/5'</td>
        <td>Ex-3 to Int+6</td>
      </tr>
      <tr>
        <td>Shapiro Senapathy score at 3' ss</td>
        <td>3'/Ex</td>
        <td>Int-14 to Ex+1</td>
      </tr>
      <tr>
        <td>Shapiro Senapathy score at 5' ss</td>
        <td>Ex/5'</td>
        <td>Ex-2 to Int+6</td>
      </tr>
      <tr>
        <td>Gain of GT dinucleotide</td>
        <td>3'</td>
        <td>Int-50 to Int-3</td>
      </tr>
      <tr>
        <td>Gain of AG dinucleotide</td>
        <td>3'</td>
        <td>Int-50 to Int-3</td>
      </tr>
      <tr>
        <td>Sum SpliceAid2 score of RNA-binding protein (RBP) <b>x71</b></td>
        <td>3'/Ex/5'</td>
        <td>Int-50 to Int+50</td>
      </tr>
    </table><br>

![Figure 1](/scripts/Suppl_Fig_S1.png)\
Figure 1. Overview of strategies for IntSplice2 and IntSplice2-Benchmark (BM). IntSplice2-BM is the model to compare with IntSplice which is the previous version of IntSplice2 by using the test data which does not include in the both models.
## Publication
Please cite: Jun-ichi Takeda, Sae Fukami, Akira Tamura, Akihide Shibata, and Kinji Ohno. “IntSplice2: Prediction of the Splicing Effects of Intronic Single-Nucleotide Variants Using LightGBM Modeling” Front Genet. 2021 Jul 19;12:701076 ([PMID: 34349788](https://pubmed.ncbi.nlm.nih.gov/34349788/)).
## Related tools
[InMeRF (hg38)](https://github.com/jtakeda-tokai/inmerf_hg38.git)\
[InMeRF (hg19)](https://github.com/jtakeda-tokai/inmerf_hg19.git)\
[FexSplice (hg19/hg38)](https://github.com/jtakeda-tokai/fexsplice.git)
