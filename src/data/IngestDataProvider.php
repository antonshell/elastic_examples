<?php

namespace src\data;

/**
 * Class IngestDataProvider
 * @package src\data
 */
class IngestDataProvider extends BaseDataProvider implements DataProviderInterface
{
    /**
     * @return array
     */
    public function getData():array
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Test Pdf',
                'file' => 'nalog_org.pdf',

            ],
            [
                'id' => 2,
                'name' => 'Test_Doc',
                'file' => 'Test_Doc.doc'
            ],
            [
                'id' => 3,
                'name' => 'Test_Docx',
                'file' => 'Test_Docx.docx'
            ],
            [
                'id' => 4,
                'name' => 'Test_Ppt',
                'file' => 'Test_Ppt.ppt'
            ],
            [
                'id' => 5,
                'name' => 'Test_Pptx',
                'file' => 'Test_Pptx.pptx'
            ],
            [
                'id' => 6,
                'name' => 'Test_Rtf',
                'file' => 'Test_Rtf.rtf'
            ],
            [
                'id' => 7,
                'name' => 'Test_Txt',
                'file' => 'Test_Txt.txt',
                'callback' => function($fileName){
                    $path = __DIR__ . '/../../ingest/' . $fileName;
                    $cc = file_get_contents($path);
                    $encoded = base64_encode($cc);
                    return $encoded;
                }

            ],
            [
                'id' => 8,
                'name' => 'Test_Xls',
                'file' => 'Test_Xls.xls'
            ],
            [
                'id' => 9,
                'name' => 'Test_Xlsx',
                'file' => 'Test_Xlsx.xlsx'
            ],
        ];

        return $data;

    }
}