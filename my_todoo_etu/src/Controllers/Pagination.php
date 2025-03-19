<?php

namespace App;

class Pagination {
    public static function paginate(array $entreprises, int $page, int $entreprisesParPage): array {
        if ($page <= 0) {
            $page = 1;
        }

        $start = ($page - 1) * $entreprisesParPage;
        return array_slice($entreprises, $start, $entreprisesParPage);
    }

    public static function getTotalPages(array $entreprises, int $entreprisesParPage): int {
        return ceil(count($entreprises) / $entreprisesParPage);
    }
}
