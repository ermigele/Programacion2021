package dwes.java.spring.proyecto;

import java.util.Arrays;

import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;

import dwes.java.spring.proyecto.models.Empleado;
import dwes.java.spring.proyecto.repositorios.EmpleadoRepository;
import dwes.java.spring.proyecto.upload.storage.StorageService;

@SpringBootApplication
public class ProyectoApplication {

	public static void main(String[] args) {
		SpringApplication.run(ProyectoApplication.class, args);
	}
	
	/**
	 * Este bean se inicia al lanzar la aplicación. Nos permite inicializar el almacenamiento
	 * secundario del proyecto
	 * 
	 * @param storageService Almacenamiento secundario del proyecto
	 * @return
	 */
	@Bean
    CommandLineRunner init(StorageService storageService) {
        return (args) -> {
            storageService.deleteAll();
            storageService.init();
        };
    }
	
	@Bean
	CommandLineRunner initData(EmpleadoRepository repositorio) {
		return (args) -> {
			System.out.println("Carga de datos");
			repositorio.saveAll(
					Arrays.asList(
							new Empleado(1,"Beatriz Sabaté","beatriz.sabate@email.com","954019225"),
							new Empleado(2,"María López","maria.lopez@email.com","954450297"),
							new Empleado(3,"Mónica Fernández","monica.fernandez@email.com","954287953"),
							new Empleado(4,"Beatriz Fernández","beatriz.fernandez@email.com","954494586"),
							new Empleado(5,"Rosario Pérez","rosario.perez@email.com","954071316"),
							new Empleado(6,"Carmen García","carmen.garcia@email.com","954281724"),
							new Empleado(7,"Nuria Pastor","nuria.pastor@email.com","954459254"),
							new Empleado(8,"Elena Montaño","elena.montano@email.com","954929233"),
							new Empleado(9,"Daniel Hernández","daniel.hernandez@email.com","954443192"),
							new Empleado(10,"Pedro García","pedro.garcia@email.com","954345863"),
							new Empleado(11,"Francisco Cabrera","francisco.cabrera@email.com","954256634"),
							new Empleado(12,"Ángel Álvarez","angel.alvarez@email.com","954996338"),
							new Empleado(13,"Francisca López","francisca.lopez@email.com","954915523"),
							new Empleado(14,"Mireia Alarcón","mireia.alarcon@email.com","954178378"),
							new Empleado(15,"María José Fernández","maria.jose.fernandez@email.com","954912563"),
							new Empleado(16,"Juan Rodríguez","juan.rodriguez@email.com","954629575"),
							new Empleado(17,"Estibaliz Mirón","estibaliz.miron@email.com","954089885"),
							new Empleado(18,"Ana María Tapia","ana.maria.tapia@email.com","954574138"),
							new Empleado(19,"Vicente Gutiérrez","vicente.gutierrez@email.com","954251505"),
							new Empleado(20,"Francisca Linares","francisca.linares@email.com","954836965"),
							new Empleado(21,"María López","maria.lopez@email.com","954301348"),
							new Empleado(22,"María Carmen Vázquez","maria.carmen.vazquez@email.com","954947585"),
							new Empleado(23,"Julia Jiménez","julia.jimenez@email.com","954830224"),
							new Empleado(24,"Antonia Andrade","antonia.andrade@email.com","954969936"),
							new Empleado(25,"Andrés Cervantes","andres.cervantes@email.com","954821552"),
							new Empleado(26,"Sergio Rodríguez","sergio.rodriguez@email.com","954290793"),
							new Empleado(27,"Iván Aguilar","ivan.aguilar@email.com","954610774"),
							new Empleado(28,"Juan Aranda","juan.aranda@email.com","954565279"),
							new Empleado(29,"Francisca Martin","francisca.martin@email.com","954971642"),
							new Empleado(30,"Antonio Barrera","antonio.barrera@email.com","954000325"),
							new Empleado(31,"Maider Pujol","maider.pujol@email.com","954740884"),
							new Empleado(32,"Antonia Fernández","antonia.fernandez@email.com","954667198"),
							new Empleado(33,"Rosa María Manrique","rosa.maria.manrique@email.com","954507173"),
							new Empleado(34,"Ricardo Cañada","ricardo.canada@email.com","954790058"),
							new Empleado(35,"Manuel Viñas","manuel.vinas@email.com","954652769"),
							new Empleado(36,"Juan José Quesada","juan.jose.quesada@email.com","954098710"),
							new Empleado(37,"Paula Arredondo","paula.arredondo@email.com","954898930"),
							new Empleado(38,"David Sánchez","david.sanchez@email.com","954573518"),
							new Empleado(39,"Raúl Martínez","raul.martinez@email.com","954948248"),
							new Empleado(40,"Antonia Rubio","antonia.rubio@email.com","954385410"),
							new Empleado(41,"Carlos Carmona","carlos.carmona@email.com","954560335"),
							new Empleado(42,"María Teresa Lozano","maria.teresa.lozano@email.com","954143153"),
							new Empleado(43,"Alberto Alvarado","alberto.alvarado@email.com","954906913"),
							new Empleado(44,"Javier Sánchez","javier.sanchez@email.com","954678628"),
							new Empleado(45,"Manuel Álvarez","manuel.alvarez@email.com","954355878"),
							new Empleado(46,"Sergio Valls","sergio.valls@email.com","954756460"),
							new Empleado(47,"Ramón Muñoz","ramon.muñoz@email.com","954665071"),
							new Empleado(48,"Joaquín Maldonado","joaquin.maldonado@email.com","954179169"),
							new Empleado(49,"Manuel Fernández","manuel.fernandez@email.com","954030439"),
							new Empleado(50,"Josefa Rivas","josefa.rivas@email.com","954205689")
						)
					);
		};
	}

}
