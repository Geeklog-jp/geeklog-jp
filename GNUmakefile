#

CHANGES=	CHANGES.jp CHANGES-1.8.jp CHANGES-1.7.jp CHANGES-1.6.jp \
		CHANGES-1.5.jp
FILES=		$(CHANGES) INSTALL NEWS README.jp \
		db-config.php emailgeeklogstories emailgeeklogstories.en \
		readme readme.ja release_jp.php
DIRS=		backups data language logs plugins sql system

SUBDIR=		custom plugins-jp
ESUBDIR=	extended 

GLDESTDIR?=	$(GLDIR)

PREINSTALL=	pre-install

all:

pre-install:
	$(MKDIR) $(DESTDIR)$(GLDIR)
	$(MKDIR) $(DESTDIR)$(GLPUBDIR)


pre-release:
	@if [ "$(GLDIR)" != "`$(DIRNAME) $(GLPUBDIR)`" ]; then \
		echo "$(GLPUBDIR) should be under $(GLDIR) when making release."; \
		exit 1; \
	fi
	cd $(DESTDIR)$(TOPDIR) && $(RM) -r $(GLBASE) $(GL_RELEASE)

install: $(PREINSTALL) install-myfiles install-dirs install-pubdir

print-release:
	@echo ${GL_RELEASE}

release: pre-release update-release-jp install
	cd $(TOPDIR); \
	$(MV) $(GLBASE) $(GL_RELEASE); \
	$(TAR) -c -f - $(GL_RELEASE) | $(GZIP) -9 > $(GL_RELEASE).tar.gz; \
	$(RM) -f $(GL_RELEASE).zip; \
	$(ZIP) -qr $(GL_RELEASE).zip $(GL_RELEASE)

update-release-jp: release_jp.php

release_jp.php: GNUmakefile.common GNUmakefile
	@unset LANG LC_TIME; \
	if [ `${SED} -n -e '/release_no =/s|.*= "\([^"][^"]*\)";|\1|p' release_jp.php` != "$(GL_JPVERSION)" ]; then \
		$(SED) -e '/release_no =/s|".*"|"$(GL_JPVERSION)"|' \
		-e '/release_date =/s|".*"|"'"`date -u`"'"|' release_jp.php \
		> release_jp.php.tmp && \
		${MV} release_jp.php.tmp release_jp.php; \
	fi

include GNUmakefile.common
