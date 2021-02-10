package dwes_java_conexion;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class Conexion {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		try {
			// A traves de la siguiente l�nea comprobamos su tenemos acceso al driver MySQL,
			// si no fuera as� no podemos trabajr con esa BBDD 
			Class.forName("com.mysql.cj.jdbc.Driver"); // Driver MySQL 8))
			
			// Necesitamos obtener un acceso a la BBDD, esto se materializa en un objeto Connection,
			// al cula le tenemos que pasar los par�metros de conexi�n
			
			Connection conexion = (Connection) DriverManager.getConnection("jdbc:mysql://localhost/dwes_dic2020","root","");

			//Para poder ejecutar una consulta necesitamos utilizar un objeto de tipo $statemnet
			Statement s = (Statement) conexion.createStatement();
			
			// La ejecuci�n de la consulta se realiza a trav�s del objeto Statement y se recibe en forma de objeto
			// de tipo ResultSet, que puede ser navegado para descubrir todos los registros por la consulta
			ResultSet rs = s.executeQuery(" select * from centros");
			
			// Navegaci�n del objeto ResulSe, cada campo se puede referenciar por su nombreo un n�mero con la posici�n
			// que ocupa en la tupla, comenzando por el valor 1 (en est cao no comenzamos por el valor 0)
			while(rs.next()) {
				System.out.println( rs.getInt("id")+ " " + rs.getString("nombre") + " " + rs.getString(3));
			}
			
			// Cierre de los elementos
			rs.close();
			s.close();
			conexion.close();
			
		}catch(ClassNotFoundException ex) {
			System.out.println("Imposisible acceder al Driver Mysql");
			ex.printStackTrace();
		}catch(SQLException ex) {
			System.out.println("Error en la ejecuci�n de SQL" + ex.getMessage());
			ex.printStackTrace();
		}
	}

}
