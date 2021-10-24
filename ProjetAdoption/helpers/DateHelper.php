<?php
class DateHelper
{
    public CONST DATE_FORMAT = "Y-m-d";
    public CONST DATE_FORMAT_VIEW = "d-m-Y";

    public static function toDateTime(?string $dateString) : ?DateTime
    {
        return self::dateFromFormat($dateString,self::DATE_FORMAT);
    }
    public static function toDateTimeWithFormat(?string $dateAsString,string $dateFormat) : ?DateTime
    {
        // var_dump($dateAsString);
        return self::dateFromFormat($dateAsString,$dateFormat);
    }

    private static function dateFromFormat(string $dateAsString, string $dateFormat): ?DateTime
    {
        $date = DateTime::createFromFormat( $dateFormat,$dateAsString);
        //$date = \DateTime::createFromFormat("2020-08-13", $dateFormat);

        if (false === $date) {
            return NULL;
        }
        list('warning_count' => $warning_count, 'error_count' => $error_count) = $date->getLastErrors();
        if (0 < $warning_count + $error_count) {
            return NULL;
        }
        return $date;
    }
}
