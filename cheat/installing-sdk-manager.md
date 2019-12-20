https://www.oracle.com/technetwork/java/java-se-support-roadmap.html

error
`
Exception in thread "main" java.lang.NoClassDefFoundError: javax/xml/bind/annotation/XmlSchema
 at com.android.repository.api.SchemaModule$SchemaModuleVersion.<init>(SchemaModule.java:156)
 at com.android.repository.api.SchemaModule.<init>(SchemaModule.java:75)
 at com.android.sdklib.repository.AndroidSdkHandler.<clinit>(AndroidSdkHandler.java:81)
 at com.android.sdklib.tool.SdkManagerCli.main(SdkManagerCli.java:117)
 at com.android.sdklib.tool.SdkManagerCli.main(SdkManagerCli.java:93)
 Caused by: java.lang.ClassNotFoundException: javax.xml.bind.annotation.XmlSchema
 at java.base/jdk.internal.loader.BuiltinClassLoader.loadClass(BuiltinClassLoader.java:582)
 at java.base/jdk.internal.loader.ClassLoaders$AppClassLoader.loadClass(ClassLoaders.java:190)
 at java.base/java.lang.ClassLoader.loadClass(ClassLoader.java:499)
 ... 5 more
 `
 
 edit sdkmanager
 
 `-XX:+IgnoreUnrecognizedVMOptions --add-modules java.se.ee`
 
 `DEFAULT_JVM_OPTS='"-Dcom.android.sdklib.toolsdir=$APP_HOME" -XX:+IgnoreUnrecognizedVMOptions --add-modules java.se.ee'`
 
 
 
 command create android emulator
 
 `sudo apt-get install qemu-kvm libvirt-bin ubuntu-vm-builder bridge-utils`
 
 `sdkmanager "system-images;android-28;google_apis_playstore;x86_64"
 sdkmanager "platform-tools"
 sdkmanager "build-tools;28.0.3"
 sdkmanager "platforms;android-28"
 sdkmanager "emulator"
 avdmanager -s create avd -n pixel -k "system-images;android-28;google_apis_playstore;x86_64"
 emulator -noaudio -avd pixel
 `
 
 `mkdir -p .android && touch ~/.android/repositories.cfg`
