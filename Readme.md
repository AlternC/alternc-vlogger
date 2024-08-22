# Purpose #

This package provides an alternative to [vlogger package](https://packages.debian.org/vlogger).
Vlogger is no more provided from [bookworm](https://packages.debian.org/bookworm/vlogger) but AlternC requires it to manage all apache2 vhost log.

# Get the package #

## Build own package ##

You can compile this package with:

```
    apt install build-essential debhelper git
    git clone https://github.com/AlternC/alternc-vlogger
    cd alternc-a
    dpkg-buildpackage -us -uc
```

## From GitHub ##

You can obtain nightly and last stable package from the dedicated page : [releases page](https://github.com/AlternC/alternc-vlogger/releases)

## From our repository ##

Our stable repository is avalaible at https://debian.alternc.org

```
echo "deb http://debian.alternc.org/ $(lsb_release -cs) main" >> /etc/apt/sources.list.d/alternc.list
wget https://debian.alternc.org/key.txt -O - | apt-key add -
apt update
```

# Dependency #

It's a standalone package.


# How to use #

This package provides a vlogger script wrote in PHP with similar arguments.

```
Usage: vlogger [OPTIONS]... <LOGDIR>
Handles a piped logfile from a webserver, splitting it into it's
host components, and rotates the files daily.

  -a                          do NOT autoflush files
  -e                          errorlog mode
  -n                          don't rotate files
  -f MAXFILES                 max number of files to keep open
  -u UID                      uid to switch to when running as root
  -g GID                      gid to switch to when running as root
  -t TEMPLATE                 filename template (see man strftime)
  -s SYMLINK                  maintain a symlink to most recent file
  -r SIZE                     rotate when file reaches SIZE
  -d CONFIG                   ignored (and not implemented from perl-vlogger)
  -i                          ignored (and not implemented from perl-vlogger)
  -h                          display this help
  -v                          output version information

TEMPLATE may be a filename with strftime codes. The default template
is %m%d%Y-access.log. SYMLINK is the name of a file that will be linked to
the most recent file inside the log directory. The default is access.log.
MAXFILES is the maximum number of filehandles to cache. The defaults is taken from ulimit.
When running with -a, performance may improve, but this might confuse some
log analysis software that expects complete log entries at all times.
Errorlog mode is used when running with an Apache errorlog. In this mode,
virtualhost parsing is disabled, and a single file is written in LOGDIR
using the TEMPLATE (%m%d%Y-error.log is default for -e). When running with
-r, the template becomes %m%d%Y-%T-xxx.log. SIZE is given in bytes.

Report bugs to <benjamin@octopuce.fr>.
```