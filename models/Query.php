<?php
include_once('db_connection.php');
class Query extends Connect
{
    public function get(string $table, array $columns = [], array $conditions = [])
    {
        // Verifica si se especificaron columnas; si no, selecciona todas (*)
        $columnList = empty($columns) ? '*' : implode(', ', $columns);

        // Construye la consulta SQL
        $query = "SELECT $columnList FROM $table";

        // Agrega condiciones si se proporcionaron
        if (!empty($conditions)) {
            $conditionList = implode(' AND ', $conditions);
            $query .= " WHERE $conditionList";
        }
        // Ejecuta la consulta y devuelve los resultados
        $stmt = $this->get_query($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(string $table, array $fieldsValues)
    {
        $values = array_values($fieldsValues);
        $fields = array_keys($fieldsValues);

        if (count($fields) !== count($values)) {
            return false;
        }

        $fieldList = implode(', ', $fields);
        $placeholderList = implode(', ', array_fill(0, count($fields), '?'));

        $query = "INSERT INTO $table (id, $fieldList) VALUES (UUID(), $placeholderList)";


        

        $stmt = $this->get_query($query);
        $stmt->execute($values);

        return $stmt->rowCount();
    }

    public function update($table, array $fieldsValues, $conditions = [])
    {
        $values = array_values($fieldsValues);
        $fields = array_keys($fieldsValues);

        if (count($fields) !== count($values)) {
            return false;
        }

        $setList = [];
        for ($i = 0; $i < count($fields); $i++) {
            $setList[] = $fields[$i] . ' = ?';
        }
        $setClause = implode(', ', $setList);

        $conditionList = [];
        foreach ($conditions as $key => $value) {
            $conditionList[] = $key . ' = ' . $value;
        }
        $conditionClause = implode(' AND ', $conditionList);

        $query = "UPDATE $table SET $setClause WHERE $conditionClause";

        $stmt = $this->get_query($query);
        $stmt->execute($values);

        return $stmt->rowCount();
    }

    public function delete($table, $id)
    {
        $query = "DELETE FROM $table WHERE id = ?";
        $stmt = $this->get_query($query);
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
}