package dwes.java.spring.proyecto.security;

import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;
import org.springframework.security.crypto.password.NoOpPasswordEncoder;

@EnableWebSecurity
public class SegurityConfig extends WebSecurityConfigurerAdapter{

@Override
protected void configure(AuthenticationManagerBuilder auth) throws Exception {

auth
.inMemoryAuthentication()
.passwordEncoder(NoOpPasswordEncoder.getInstance())
.withUser("admin")
.password("admin")
.roles("ADMIN");

}

@Override
protected void configure(HttpSecurity http) throws Exception {
http
.authorizeRequests()
.antMatchers("/webjars/**","/css/**")
.permitAll()
.anyRequest()
.authenticated()
.and()
.formLogin()
.loginPage("/login")
.permitAll();
}



}