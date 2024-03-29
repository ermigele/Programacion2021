package dwes.spring.tarea.miguelangel.martin.configuracion;

import org.springframework.boot.context.properties.EnableConfigurationProperties;
import org.springframework.context.MessageSource;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.support.ReloadableResourceBundleMessageSource;
import org.springframework.validation.beanvalidation.LocalValidatorFactoryBean;

import dwes.spring.tarea.miguelangel.martin.upload.storage.StorageProperties;



@Configuration
@EnableConfigurationProperties(StorageProperties.class)
public class MyConfig {
	
	@Bean
	public MessageSource messageResource() {
		ReloadableResourceBundleMessageSource messageSource =
				new ReloadableResourceBundleMessageSource();
		
		messageSource.setBasename("classpath:errors");
		messageSource.setDefaultEncoding("UTF-8");
		
		return messageSource;
	}
	
	@Bean
	public LocalValidatorFactoryBean getValidator() {
		LocalValidatorFactoryBean bean = new LocalValidatorFactoryBean();
		bean.setValidationMessageSource(messageResource());
		return bean;
	}
	
	

}