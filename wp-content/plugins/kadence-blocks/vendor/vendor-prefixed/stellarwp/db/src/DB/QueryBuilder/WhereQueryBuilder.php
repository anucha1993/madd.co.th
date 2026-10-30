<?php

namespace KadenceWP\KadenceBlocks\StellarWP\DB\QueryBuilder;

use KadenceWP\KadenceBlocks\StellarWP\DB\QueryBuilder\Concerns\WhereClause;

/**
 * @since 1.0.0
 */
class WhereQueryBuilder {
	use WhereClause;

	/**
	 * @return string[]
	 */
	public function getSQL() {
		return $this->getWhereSQL();
	}
}
